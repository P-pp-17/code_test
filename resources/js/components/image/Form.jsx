import React from 'react';

export default function Form({ isLoading, handleChange, imagePath, serverError }) {
    return (
        <div className="custom-file">
            <input
                type="hidden"
                name="image_path"
                value={imagePath}
            />
            <input
                type="file"
                className={"custom-file-input " + (serverError ? "is-invalid" : "")}
                id="image"
                onChange={handleChange}
                accept=".jpg,.jpeg,.png"
                disabled={imagePath}
            />
            <label className="custom-file-label" htmlFor="image">
                {isLoading ? 'Loading...' : 'Upload Image'}
            </label>
            {serverError && (<span id="image-error" className="error invalid-feedback">
                {serverError}
            </span>
            )}
        </div>
    )
}
