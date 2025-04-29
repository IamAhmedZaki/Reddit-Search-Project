export default{
    search: function (searchInput,searchLimit,sortBy) {
        return fetch(`http://www.reddit.com/search.json?q=${searchInput}&sortby=${sortBy}&limit=${searchLimit}`)
        .then(res=>res.json())
        .then(data=>data.data.children.map(data=>data.data))
        .catch(err=>console.log(err))
        
        
    }
}