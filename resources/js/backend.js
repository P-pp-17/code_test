/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */
require("./bootstrap");
require("admin-lte/dist/js/adminlte.min.js");
require("admin-lte/plugins/pace-progress/pace.min.js");
require("admin-lte/plugins/select2/js/select2.min.js");
require("admin-lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js");

import Swal from "admin-lte/plugins/sweetalert2/sweetalert2.min.js";

require("./components/image/Index.jsx");

$(document).ready(function () {
    // Succes Modal with SweetAlert2
    let swal = document.getElementById("swal");
    if (swal) {
        Swal.fire(
            `${swal.getAttribute("data-title")}`,
            `${swal.getAttribute("data-message")}`,
            `${swal.getAttribute("data-icon")}`
        );
    }


    // Toggle Password Field
    $("#toggle-password").on("click", function (e) {
        e.preventDefault();
        if ($("#password").attr("type") === "password") {
            $("#password").attr("type", "text");
            $(this).html("<small>Hide Password</small>");
        } else {
            $("#password").attr("type", "password");
            $(this).html("<small>Show Password</small>");
        }
    });

    $("#toggle-confirm-password").on("click", function (e) {
        e.preventDefault();
        if ($("#confirm-password").attr("type") === "password") {
            $("#confirm-password").attr("type", "text");
            $(this).html("<small>Hide Password</small>");
        } else {
            $("#confirm-password").attr("type", "password");
            $(this).html("<small>Show Password</small>");
        }
    });

    // Boostrap Switch
    $(".boostrap-switch").bootstrapSwitch({
        onColor: "success",
        offColor: "danger",
        onText: "Yes",
        offText: "No",
        state: $(this).prop("checked"),
        onSwitchChange: function (e) {
            e.preventDefault();
            let id = $(this).attr("data-id");
            let type = $(this).attr("data-type");
            axios
                .put(`/${type}/active-status/${id}`, {
                    is_active: $(this).prop("checked")
                })
                .then(res => console.log("updated"))
                .catch(e => console.log(e));
        }
    });

    // PopOver
    $('[data-toggle="popover"]').popover({
        trigger: "hover"
    });

    // Select Box with Select2
    $(".js-select-2").select2({
        theme: "bootstrap4"
    });

    $(".js-select-2-multiple").select2({
        theme: "bootstrap4",
        placeholder: $(this).attr("data-placeholder")
    });

    // Select 2 Init Value
    $("#category")
        .val($("#category").attr("data-selected"))
        .trigger("change");
    $("#state-and-division")
        .val($("#state-and-division").attr("data-selected"))
        .trigger("change");
    $("#township")
        .val($("#township").attr("data-selected"))
        .trigger("change");
    $("#role")
        .val($("#role").attr("data-selected"))
        .trigger("change");

    // Remove Modal with SweetAlert2
    $(".remove").on("click", function (e) {
        e.preventDefault();
        let id = $(this).attr("data-id");
        let content = $(this).attr("data-remove-content");
        let type = $(this).attr("data-type");
        Swal.fire({
            title: "Are you sure?",
            text: `You want to remove ${content}!`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, remove it!"
        }).then(result => {
            if (result.value) {
                axios
                    .delete(`/backend/${type}/${id}`)
                    .then(res => {
                        if (res.data.status === "success") {
                            Swal.fire(
                                "Removed!",
                                `${res.data.message}`,
                                `${res.data.status}`
                            ).then(result => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire(
                                "Remove Failed!",
                                `Cannot remove the ${content}.`,
                                "error"
                            );
                        }
                    })
                    .catch(e => console.log(e));
            }
        });
    });

    //summernote
    $(".summernote").summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        minHeight: "300px",
        callbacks: {
            onInit: function () {
                if ($(this).attr("data-content")) {
                    $("#summernote").summernote(
                        "code",
                        JSON.parse($(this).attr("data-content"))
                    );
                }
            },
            onImageUpload: function (files) {
                uploadImage(files[0]);
            },
            onMediaDelete: function (target) {
                deleteImage(target[0].src);
            }
        }
    });

    function uploadImage(image) {
        let data = new FormData();
        data.append("image", image);
        axios
            .post("/backend/summernote-image", data, {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            })
            .then(res => {
                if (res.data.status === "success") {
                    let url = "/storage/" + res.data.imagePath;
                    console.log(url);
                    $(".summernote").summernote("insertImage", url);
                } else {
                    console.log("Something went wrong!");
                }
            })
            .catch(e => {
                console.log(e.response);
                if (e.response.status === 422) {
                    Swal.fire(
                        "Image Error",
                        `${e.response.data.errors.image[0]}`,
                        "error"
                    );
                }
            });
    }

    function deleteImage(image) {
        let uris = image.split("/");
        let imagePath = "" + uris[4] + "/" + uris[5] + "";
        axios
            .delete("/backend/image", {
                data: { imagePath }
            })
            .then(res => {
                if (res.status === 204) {
                    Swal.fire("Success", "Image has been deleted.", "success");
                } else {
                    console.log("Something went wrong!");
                }
            })
            .catch(e => console.log(e));
    }
});

$("#state-and-division").on("select2:select", function (e) {
    axios
        .get("/backend/state-and-divisions/" + e.params.data.id + "/townships")
        .then(res => {
            $("#township").html(res.data);
        })
        .catch(e => console.log(e));
});
