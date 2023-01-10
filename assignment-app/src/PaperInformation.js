import React, {useState, useEffect} from 'react';

function PaperInformation(props) {

    //Insert a use effect here for the authors end point
    //This should fix the issue of the page not refreshing each when clicking on the links
    
    const [authors, setAuthors] = useState([]);
    const [loading, setLoading] = useState(true);
    const [visible, setVisible] = useState(false);

    const fetchData = () => {
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
    };

    const allAuthors = authors.map(
        (value, key) => <section key = {key}>
            <div>{value.first_name}, {value.last_name}</div>
        </section>    
    )

    const showDetails = () => {
        fetchData();
        setVisible(!visible)
    }


    return (
        <div className = "PaperInformation" onClick = {showDetails}>
            <div className='title'>{props.paperInfo.title}</div>
            {visible && <div>
                <div className='abstract'><h4>Abstract</h4>{props.paperInfo.abstract}</div>
                <div className='award'><h4>Awards?</h4>{props.paperInfo.award ? 'Awarded' : 'Not Awarded'}</div>
                <div className='authors'><h4>Author(/s)</h4>{allAuthors}</div>
            </div>}
        </div>
    )
}

export default PaperInformation;