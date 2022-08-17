import React from 'react'

export default function Preview({ imagePath, handleClick, previewClass }) {
    return (
        <div className="row px-2">
            <div className="col-md-12 px-0 mb-2" key={imagePath}>
                <img
                    src={"/storage/" + imagePath}
                    alt="image"
                    className={"mb-2 " + previewClass}
                />
                <br />
                <button
                    type="button"
                    className="btn btn-danger btn-flat"
                    onClick={(event) => handleClick(event, imagePath)}
                >
                    Remove
                </button>
            </div>
        </div >
    )
}
