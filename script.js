const searchForm=document.getElementById('search-form');
const searchInput=document.getElementById('search-input');

searchForm,addEventListener('submit', e=>{
    //get serach term
    const searchTerm=searchInput.value;
    //sortby check box
    const sortBy=document.querySelector('input[name="sortby"]:checked').value;
    // limit
    const searchLimit=document.getElementById('limit').value;
    console.log(searchLimit);

    if (searchTerm==='') {
        showMessage(
            " No term for Searching was given","alert-danger"
        )
    }
    
    
    e.preventDefault()
})

function showMessage(message,className) {
    const div=document.createElement('div');
    //add class
    div.className=` alert ${className}`;
    //add message
    div.appendChild(document.createTextNode(message));

    //inserting in the search container
    const searchContainer=document.getElementById('search-container');

    const search=document.getElementById('search');

    searchContainer.insertBefore(div,search);

    //removing message 
    setTimeout(()=>{
      document.querySelector('.alert').remove()  
    },3000)

}