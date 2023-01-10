import Footer from './Footer';
import Navbar from './Navbar';
import Track from './Track';
import { useEffect, useState } from 'react';
import PaperInformation from './PaperInformation';

function Papers() {
    
    const [papers, setPapers] = useState([]);
    const [loading, setLoading] = useState(true);
    const [searchTerm, setSearchTerm] = useState('');

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

    const searchPapers = (value) => {
        const fullSearch = value.title + " " + value.abstract;
        return fullSearch.toLowerCase().includes(searchTerm.toLowerCase());
    }

    const allPapers = papers.filter(searchPapers).map(
        (value, key) => <section key = {key}>
            <PaperInformation paperInfo = {value}/>
        </section>    
    )
    

    const userTyping = (event) => setSearchTerm(event.target.value);

    return (
      <div className="Papers">
        <h2>Papers</h2>
        <h3>Search title: </h3>
        <input value = {searchTerm} onChange={userTyping}/>
        {loading && <p>Loading...</p>}
        {allPapers}
        <Footer/>
      </div>
    );
  }
  
  export default Papers;