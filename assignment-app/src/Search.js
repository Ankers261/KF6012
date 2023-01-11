

function Search(props) {

    /**
     * 
     * Handles the user searching for titles and abstracts in the paper table
     * 
     * @author Jason Ankers
     * @author John Rooksby
     */
    const userTyping = (event) => props.handler(event.target.value);

    return (
        <div>
            <input value = {props.searchTerm} onChange={userTyping}/>
        </div>
    );
}

export default Search;