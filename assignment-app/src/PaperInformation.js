import React, {useState, useEffect} from 'react';

function PaperInformation(props) {

    //Insert a use effect here for the authors end point
    //This should fix the issue of the page not refreshing each when clicking on the links
    
    return (
        <div className = "PaperInformation">
            <div>{props.paperInfo.title}</div>
            <div>{props.paperInfo.abstract}</div>
            <div>{props.paperInfo.award}</div>
        </div>
    )
}

export default PaperInformation;