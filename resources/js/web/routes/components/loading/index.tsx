import React, {FC} from 'react';



const Loading: FC = () => {
    return (
        <div className="container text-center my-5">
            <div className="spinner-grow text-primary" role="status">
                <span className="visually-hidden">Loading...</span>
            </div>
        </div>
    );
}

export default Loading
