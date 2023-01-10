function Select(props) {
    
    const onChangeSelect = (event) => {props.handler(event.target.value)};

    return (
        <div>
            <select value = {props.selectValue} onChange = {onChangeSelect}>
                <option value = "all">All</option>
                <option value = "true">Awarded</option>
                <option value = "">Non-awarded</option>
            </select>
        </div>
    );
}

export default Select;