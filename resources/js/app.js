/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');
require("admin-lte/plugins/select2/js/select2.min.js");
/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.Vue = require('vue');
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';

Vue.component('v-select', vSelect)

import * as VueGoogleMaps from 'vue2-google-maps';

Vue.use(VueGoogleMaps, {
	load: {
		key: 'AIzaSyBwUn0MvsaITWHuY_23HnZAY3WtfQyL8j0'
	}
});

if (document.getElementById('map')) {
	const map = new Vue({
		el: '#map',
		data() {
			return {
				branches: [],
				stateAndDivisions: [],
				townships: [],
				infoWindowOptions: {
					pixelOffset: {
						width: 0,
						height: -35
					}
				},
				activeBranch: null,
				infoWindowOpened: false,
				stateAndDivisionId: 0,
				townshipId: 0,
				keywords: ""
			}
		},
		mounted() {
			axios.get('/api/v1/state_and_divisions')
				.then(response => {
					this.stateAndDivisions = response.data.state_and_divisions;
					let firstStateAndDivisionId = response.data.state_and_divisions[0].id;
					this.stateAndDivisionId = firstStateAndDivisionId;
					axios.get(`/api/v1/branches?state_and_division_id=${firstStateAndDivisionId}`)
						.then(response => {
							this.branches = response.data.branches;
						})
						.catch(error => console.error(error));
				})
				.catch(error => console.error(error));
		},

		watch: {
			'stateAndDivisionId': function (oldValue, newValue) {
				if (this.stateAndDivisionId == 0) {
					this.townships = [];
					this.townshipId = 0;
				}

				if (this.stateAndDivisionId > 0) {
					axios.get(`/api/v1/state_and_divisions/${this.stateAndDivisionId}/townships`)
						.then(response => {
							if (response.data.townships.length == 0) {
								this.townships = [];
								this.townshipId = 0;
							}
							if (response.data.townships.length > 0) {
								this.townships = response.data.townships;
								this.townshipId = response.data.townships[0].id;
							}

						})
						.catch(error => console.error(error));
				}
			}
		},

		methods: {
			getPosition(branch) {
				return {
					lat: parseFloat(branch.latitude),
					lng: parseFloat(branch.longitude)
				}
			},
			handleMarkerClicked(branch) {
				this.activeBranch = branch;
				this.infoWindowOpened = true;
			},
			handleWindowClose() {
				this.activeBranch = null;
				this.infoWindowOpened = false;
			},
			searchBranches() {
				axios.get(`/api/v1/branches?keywords=${this.keywords}&state_and_division_id=${this.stateAndDivisionId}&township_id=${this.townshipId}`)
					.then(response => {
						this.branches = response.data.branches
					})
					.catch(error => console.error(error));
			}
		},
		computed: {
			mapCenter() {
				if (!this.branches.length) {
					return {
						lat: 10,
						lng: 10
					}
				}

				return {
					lat: parseFloat(this.branches[0].latitude),
					lng: parseFloat(this.branches[0].longitude)
				}
			},
			infoWindowPosition() {
				return {
					lat: parseFloat(this.activeBranch.latitude),
					lng: parseFloat(this.activeBranch.longitude)
				}
			},
		},
	});

}
//slider
if (document.getElementById("home-category-slider")) {
	$("#home-category-slider").owlCarousel({
		loop: true,
		nav: false,
		items: 1,
	});
}

// Select Box with Select2
$(".js-select-2").select2({
	theme: "bootstrap4"
});

$("#locFrom")
	.val($("#locFrom").attr("data-selected"))
	.trigger("change");
$("#locTo")
	.val($("#locTo").attr("data-selected"))
	.trigger("change");
$("#currency")
	.val($("#currency").attr("data-selected"))
	.trigger("change");
$("#inputSource")
	.val($("#inputSource").attr("data-selected"))
	.trigger("change");
$("#inputDestination")
	.val($("#inputDestination").attr("data-selected"))
	.trigger("change");

$("#locTo").on("select2:select", function (e) {
	axios
		.get("/locations/" + e.params.data.id + "/remote-areas")
		.then(res => {
			$("#remote-areas").html(res.data);
		})
		.catch(e => console.log(e));
});

$("#inputSource").on("select2:select", function (e) {
	axios
		.get("/pickups/locations/" + e.params.data.id + "/source-remote-areas")
		.then(res => {
			$("#inputRemoteSource").html(res.data);
		})
		.catch(e => console.log(e));
});
$("#inputDestination").on("select2:select", function (e) {
	axios
		.get("/pickups/locations/" + e.params.data.id + "/destination-remote-areas")
		.then(res => {
			$("#inputRemoteDestination").html(res.data);
		})
		.catch(e => console.log(e));
});
$(document).ready(function(){
	$("#searchModal").modal('show');
});