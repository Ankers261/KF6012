

function Search(props) {

    const userTyping = (event) => props.handler(event.target.value);

    return (
        <div>
            <input value = {props.searchTerm} onChange={userTyping}/>
        </div>
    );
}

export default Search;