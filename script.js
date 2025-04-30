import reddit from './redditapi'

const searchForm=document.getElementById('search-form');
const searchInput=document.getElementById('search-input');

searchForm,addEventListener('submit', e=>{
    //get serach term
    const searchTerm=searchInput.value;
    //sortby check box
    const sortBy=document.querySelector('input[name="sortby"]:checked').value;
    // limit
    const searchLimit=document.getElementById('limit').value;
    

    if (searchTerm==='') {
        showMessage(
            " No term for Searching was given","alert-danger"
        )
    }

    searchInput.value='';
    
    reddit.search(searchTerm,searchLimit,sortBy)
    .then(results=>{
        console.log(results);
        
        
        let output='<div class="card-columns">'
        
        results.forEach(post => {
            const images=post.preview ? post.preview.images[0].source.url:"https://martech.org/wp-content/uploads/2014/07/reddit-combo-1920.png";
            
            output+=`<div class="card">
                        <img src="${images}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">${post.title}</h5>
                            <p class="card-text">${truncateText(post.selftext,100)}</p>
                            <a href="${post.url}" target="_blank" class="btn btn-primary">Read More</a>
                            <hr>
                            <span class= "badge bg-secondary"> Subreddit: ${post.subreddit} </span>
                            <span class= "badge bg-dark"> score: ${post.score} </span>
                        </div>
                    </div>`
        });

        
        output+='</div>'
        document.getElementById('results').innerHTML=output
    })
    
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


// truncate text
function truncateText(text,limit) {
    const shortened=text.indexOf(' ',limit);
    if(shortened==-1) return text;
    return text.substring(0,shortened);
}