
import { useEffect, useState } from 'react';
import Footer from './Footer';
import PaperInformation from './PaperInformation';
import Search from './Search';
import Select from './Select';
import './Track.css';


/**
 * 
 * Track component that is similar to the papers component except this only displays papers from each track specifically
 * 
 * @author Jason Ankers
 * @author John Rooksby
 */

function Track(props) {
    
    const [tracks, setTracks] = useState([]);
    const [loading, setLoading] = useState(true);
    const [searchTerm, setSearchTerm] = useState('');
    const [selectValue, setSelectValue] = useState('all');

    useEffect( () => {
        fetch("http://unn-w20004105.newnumyspace.co.uk/webYear3/assignment/api/papers?track=" + props.sName)
        .then(
           (response) => response.json()
        )
        .then(
            (json) => {
                setTracks(json.dataReturned)
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

    const selectAwarded = (value) => (
        (value.award ? (value.award === selectValue) : selectValue === "") || selectValue === 'all'
    )

    const allTracks = tracks.filter(searchPapers).filter(selectAwarded).map(
        (value, key) => <section key = {key}>
            <PaperInformation paperInfo = {value}/>
        </section>
    )


    const handleSelectAward = (value) => {
        setSelectValue(value);
    }

    const handleSearch = (term) => {
        setSearchTerm(term);
    }
    
    return (
        <div>
            <div  className="Track">
                <h2>{props.sName} track</h2>
                <Search searchTerm={searchTerm} handler={handleSearch} />
                <Select selectValue={selectValue} handler={handleSelectAward} />
                {allTracks}
                {loading && <p>Loading...</p>}
            </div>
            <Footer />
        </div>
    );
  }
  
  export default Track;