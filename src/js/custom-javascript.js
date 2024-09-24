// Add your JS customizations here
//podcast recent episodes
(function($) {
if (document.querySelector('.podcast-episodes')){
  //console.log('podcast page');
   const podcasts = document.querySelectorAll('.podcast-episodes');
   podcasts.forEach((podcast) =>{
    console.log(podcast.id)
    const baseUrl = podcast.dataset.url;
    const spreakerId = baseUrl.split('--')[1];
    const apiUrl = `https://api.spreaker.com/v2/shows/${spreakerId}/episodes?limit=5&export=episode_profile%2Cepisode_supporters_club&filter=listenable&sorting=1&c=en_US&escape=true`;
    if(spreakerId != null){
        listEpisodes(apiUrl, podcast.id);
        //console.log(spreakerId);
    }
    
   })
  }
 })( jQuery );


async function listEpisodes(url, destinationId) {
  const response = await fetch(url);
  const data = await response.json();
  const episodes = data.response.items;
  const destination = document.getElementById(destinationId);
  if(episodes){
    destination.innerHTML = '<h3>Recent Episodes</h3>';
  }
  episodes.forEach(async (episode) => {
    const img_url = episode.image_url;
    const title = episode.title;
    const link = episode.site_url;
    const desc = (episode.description.length> 140) ? episode.description.substring(0, 140) + ' . . .' : episode.description;
    destination.innerHTML += `<div class="episode row">
      <div class='col-md-2'>
        <img src="${img_url}" class="podcast-img">
      </div>
      <div class='col-md-10'>
          <a href="${link}" class="ep-title">${title}</a>
          <div class="ep-description">${desc}</div>
      </div></div>`;
  });
}