import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import Preview from './Preview.jsx';
import Form from './Form.jsx';

export default function Index({ oldImagePath, requiredError, previewClass }) {
    const [isLoading, setIsLoading] = useState(false);
    const [imagePath, setImagePath] = useState('');
    const [serverError, setServerError] = useState('');

    const handleChange = (event) => {
        event.preventDefault();
        setIsLoading(true);
        let image = event.target.files[0];
        let data = new FormData();
        data.append('image', image);

        axios.post('/backend/image', data,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(res => {
                if (res.data.status == 'success') {
                    setImagePath(res.data.imagePath);
                    setIsLoading(false);
                } else {
                    setIsLoading(false);
                    console.log('Something went wrong!');
                }
            })
            .catch(e => {
                if (e.response.status == 422) {
                    setServerError(e.response.data.errors.image[0]);
                    setIsLoading(false);
                }
            });
    };

    const handleClick = (event, imagePath) => {
        event.preventDefault();
        setIsLoading(true);
        if (imagePath.split("/")[0] !== "tmp") {
            setImagePath('');
            setIsLoading(false);
        } else {
            axios.delete('/backend/image', {
                data: { imagePath }
            })
                .then(res => {
                    if (res.data.status == 'success') {
                        setImagePath('');
                        setIsLoading(false);
                    } else {
                        setIsLoading(false);
                        console.log('Something went wrong!');
                    }
                })
                .catch(e => {
                    setIsLoading(false);
                    console.log(e);
                });
        }
    }
    useEffect(() => {
        setImagePath(oldImagePath);
        setServerError(requiredError);
    }, [])

    return (
        <React.Fragment>
            {imagePath && <Preview imagePath={imagePath} handleClick={handleClick} previewClass={previewClass} />}
            <Form
                isLoading={isLoading}
                handleChange={handleChange}
                imagePath={imagePath}
                key={imagePath}
                serverError={serverError}
            />
        </React.Fragment>
    )
}

if (document.getElementById('react-image-upload')) {
    let element = document.getElementById('react-image-upload');
    let oldImagePath = '';
    let requiredError = '';
    let previewClass = '';
    if (element.getAttribute('data-old-image-path')) {
        oldImagePath = element.getAttribute('data-old-image-path');
    }
    if (element.getAttribute('data-required-error')) {
        requiredError = element.getAttribute('data-required-error');
    }
    if (element.getAttribute('data-preview-class')) {
        previewClass = element.getAttribute('data-preview-class');
    }

    ReactDOM.render(
        <Index oldImagePath={oldImagePath} requiredError={requiredError} previewClass={previewClass} />,
        document.getElementById('react-image-upload')
    );
}

