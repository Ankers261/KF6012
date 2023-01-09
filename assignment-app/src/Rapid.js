import Footer from './Footer';
import Navbar from './Navbar';
import { useEffect, useState } from 'react';

function Rapid() {
    
    const [papers, setPapers] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect( () => {
        fetch("http://unn-w20004105.newnumyspace.co.uk/webYear3/assignment/api/papers?track=rapid")
        .then(
           (response) => response.json()
        )
        .then(
            (json) => {
                setPapers(json.dataReturned)
                setLoading(false)
            }
        )
        .catch(
            (e) => {
                console.log(e.message)
            }
        )
    }, []);


    const allPapers = papers.map(
        (value, key) => <p key = {key}>
            <div>Title: {value.title}</div>  <div>Award: {value.award}</div> <div>Abstract: {value.abstract}</div>
        </p>
    )
    
    return (
      <div className="Rapid">
        <h2>Rapid</h2>
        <Navbar/>
        {loading && <p>Loading...</p>}
        {allPapers}
        <Footer/>
      </div>
    );
  }
  
  export default Rapid;