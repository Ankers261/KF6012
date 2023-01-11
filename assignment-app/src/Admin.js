import React, { useState, useEffect } from 'react';
import { Buffer } from 'buffer';
import UpdateAward from './UpdateAward';

/**
 * Admin component that allows the user to see a list of all the papers and edit the award status of each one
 * 
 * @author Jason Ankers
 * @author John Rooksby
 */
function Admin(props) {

    const [username, setUsername] = useState("");
    const [password, setPassword] = useState("");

    const [papers, setPapers] = useState([]);


    useEffect(
        () => {
            if (localStorage.getItem('token')) {
                props.handleAuthenticated(true)
            }

            fetch("http://unn-w20004105.newnumyspace.co.uk/webYear3/assignment/api/papers")
            .then(
            (response) => response.json()
            )
            .then(
                (json) => {
                    setPapers(json.dataReturned)
                }
            )
            .catch(
                (e) => {
                    console.log(e.message)
                }
            )
    },[])

    const allPapers = papers.map(
        (value, key) => <section key = {key}>
            <div>
                <UpdateAward paper = {value} />
            </div>
        </section>    
    )

    const handleUsername = (event) => {
        setUsername(event.target.value);
    }

    const handlePassword = (event) => {
        setPassword(event.target.value);
    }

    const handleLogout = (event) => {
        props.handleAuthenticated(false);
        setUsername("");
        setPassword("");
        localStorage.removeItem('token');
    }

    const handleSubmit = () => {


        const encodedString = Buffer.from(
            username + ":" + password
        ).toString('base64');

        fetch("http://unn-w20004105.newnumyspace.co.uk/webYear3/assignment/api/authenticate", {
                method : "POST",
                headers: new Headers( { "Authorization": "Basic " + encodedString })
            }
        )
        .then(
           (response) => response.json()
        )
        .then(
            (json) => {
                console.log(json);
                if (json.message === "Success") {
                    props.handleAuthenticated(true);
                    localStorage.setItem('token', json.dataReturned.token);
                }
            }
        )
        .catch(
            (e) => {
                console.log(e.message)
            }
        )
    }


    return (
        <div className="Admin">
            {props.authenticated && <div>
                <h2>Update award status</h2>
                <input type = "button" value = "Logout" onClick ={handleLogout}/>
                {allPapers}
            </div>}
            {!props.authenticated && <div>
            <h2>Login</h2>
            <input 
                type = "text" 
                placeholder = "username"
                value = {username}
                onChange = {handleUsername}
            />
            <input 
                type = "password"
                placeholder = "password"
                value = {password}
                onChange = {handlePassword}
             />
             <input 
             type = "button" 
             value = "submit" 
             onClick = {handleSubmit}
             />
            </div>}
        </div>
    )
}

export default Admin;