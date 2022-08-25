function searchBar() {

    // Declare variables
    let input = document.getElementsByClassName('search_input');
    input = input.value.toLowerCase();
    let x = document.getElementsByClassName('articleSearch');

    // Loop through all list items, and hide those who don't match the search query
    for (let i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
            x[i].style.listStyle="none";
        }   
        else {
            x[i].style.display="list-item";
            x[i].style.listStyle="none";
        }
    }
}

