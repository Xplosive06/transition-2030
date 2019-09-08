const search_results = document.getElementById('search-results');
const checkbox_div = document.getElementById('checkbox-div');
const search_bar = document.getElementById('users-search');
let results = [];

$(document).ready(function () {

    try {
        if (askedUser !== undefined && askedUser !== null) {
            createUserDiv(askedUser);
        }
    } catch (error) {
        console.log("Aucun utilisateur n'a été ajouté automatiquement, le script peut continuer");
    }
    search_bar.addEventListener('input', function () {
        results = [];
        let self = this;
        createUsersElements(self);
    })

});


function createUsersElements(self = null) {


    let searchFor = self.value.toLowerCase();

    search_results.className = "list-group";

    while (search_results.firstChild) {
        search_results.removeChild(search_results.firstChild);
    }

    for (let i = 0; i < usersList.length; i++) {
        if (usersList[i].username.toLowerCase().indexOf(searchFor) > -1) {

            results.push(makeListElement(usersList[i]));

        }
    }
    if (results.length === 0)
        search_results.innerHTML = "No Results Found";
    else if (self.value === '')
        search_results.innerHTML = "";
    else
        for (let i = 0; i < results.length; i++) {
            search_results.appendChild(results[i]);
        }
}

function makeListElement(currentUser) {
    let newAElement = document.createElement('a');
    newAElement.className = "list-group-item";
    newAElement.innerHTML = currentUser.username;
    newAElement.href = 'javascript:;';


    newAElement.onclick = function () {
        let usersInputs = document.getElementById("input" + currentUser.id);
        if (usersInputs == null) {
            createUserDiv(currentUser);
        }

    };

    return newAElement;
}

function createUserDiv(currentUser) {

    let newInput = document.createElement('input');
    let newP = document.createElement('p');
    let newLabel = document.createElement('label');
    let imgElement = document.createElement('img');
    let btnElement = document.createElement('button');
    let iAElement = document.createElement('i');

    checkbox_div.className = "container row";
    newLabel.title = currentUser.username;
    newLabel.className = "row row-create-messenger";
    newInput.type = "hidden";
    newInput.name = "recipients[]";
    newInput.value = currentUser.id;
    newInput.id = "input" + currentUser.id;
    newInput.innerHTML = currentUser.username;
    newP.innerHTML = currentUser.username;
    iAElement.className = "fas fa-times-circle";
    btnElement.className = "messenger-button btn";
    btnElement.onclick = function (e) {
        e.preventDefault();
        this.parentElement.remove();
    };

    imgElement.className = "card-img index-images create-image-margin-l";
    imgElement.src = "http://" + window.location.host + "/img/uploads/avatars/" + currentUser.avatar;

    btnElement.appendChild(iAElement);
    newLabel.appendChild(newInput);
    newLabel.appendChild(newP);
    newLabel.appendChild(imgElement);
    newLabel.appendChild(btnElement);
    checkbox_div.appendChild(newLabel);
}

