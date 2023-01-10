import React, {useState, useEffect} from 'react';

function PaperInformation(props) {

    //Insert a use effect here for the authors end point
    //This should fix the issue of the page not refreshing each when clicking on the links
    
    const [authors, setAuthors] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect( () => {
        fetch("http://unn-w20004105.newnumyspace.co.uk/webYear3/assignment/api/authors?paper_id=" + props.paperInfo.paper_id)
        .then(
           (response) => response.json()
        )
        .then(
            (json) => {
                setAuthors(json.dataReturned)
                setLoading(false)
            }
        )
        .catch(
            (e) => {
                console.log(e.message)
            }
        )
    }, []);

    const allAuthors = authors.map(
        (value, key) => <section key = {key}>
            <div>{value.first_name}, {value.last_name}</div>
        </section>    
    )


    return (
        <div className = "PaperInformation">
            <div>{props.paperInfo.title}</div>
            <div>{props.paperInfo.abstract}</div>
            <div>{props.paperInfo.award}</div>
            <div>{allAuthors}</div>
        </div>
    )
}

export default PaperInformation;