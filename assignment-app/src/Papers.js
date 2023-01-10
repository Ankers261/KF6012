import Footer from './Footer';
import Navbar from './Navbar';
import Track from './Track';
import { useEffect, useState } from 'react';
import PaperInformation from './PaperInformation';

function Papers() {
    
    const [papers, setPapers] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect( () => {
        fetch("http://unn-w20004105.newnumyspace.co.uk/webYear3/assignment/api/papers")
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
        (value, key) => <section key = {key}>
            <PaperInformation paperInfo = {value}/>
        </section>    
    )
    
    return (
      <div className="Papers">
        <h2>Papers</h2>
        {loading && <p>Loading...</p>}
        {allPapers}
        <Footer/>
      </div>
    );
  }
  
  export default Papers;