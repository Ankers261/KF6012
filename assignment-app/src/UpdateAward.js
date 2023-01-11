
function UpdateAward(props) {

/**
 * Update award component that handles updating the award status of each paper in the database
 * 
 * @author Jason Ankers
 * @author John Rooksby
 */

    function refreshPage() {
        setTimeout(() => {
            window.location.reload(false);
        }, 250);
    }
 
    const handleSelect = (event) => {
        const formData = new FormData();
        formData.append('award', event.target.value);
        formData.append('paper_id', props.paper.paper_id);

        const token = localStorage.getItem('token');

        fetch("http://unn-w20004105.newnumyspace.co.uk/webYear3/assignment/api/update",
            {
                method: 'POST',
                headers: new Headers({ "Authorization": "Bearer " + token }),
                body: formData
            })
            .then(
                (response) => response.text()
            )
            .then(
                (json) => {
                    console.log(json)
                })
            .catch(
                (e) => {
                    console.log(e.message)
                })

        refreshPage();
    }



    return (
      <div>
        <h3>{props.paper.title}</h3>
        <select value = {props.paper.award ? "true" : ""} onChange = {handleSelect}>
            <option value = "">Not awarded</option>
            <option value = "true">Awarded</option>
        </select>
      </div>
    )
  }
  export default UpdateAward;