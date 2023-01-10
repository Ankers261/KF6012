
import { useEffect, useState } from 'react';
import Footer from './Footer';
import PaperInformation from './PaperInformation';

function Track(props) {
    
    const [tracks, setTracks] = useState([]);
    const [loading, setLoading] = useState(true);

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


    const allTracks = tracks.map(
        (value, key) => <section key = {key}>
            <PaperInformation paperInfo = {value}/>
        </section>
    )
    
    return (
      <div className="Track">
        {loading && <p>Loading...</p>}
        {allTracks}
        <Footer/>
      </div>
    );
  }
  
  export default Track;