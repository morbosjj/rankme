const DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest"];
const SCOPES = 'https://www.googleapis.com/auth/youtube.readonly';
const signoutButton = document.getElementById('signout-button');
const registerBtn = document.getElementById('register-button');
const searchForm = document.getElementById('search-form');
const searchInput = document.getElementById('search-input');
//ranking youtube
const keyItem = document.getElementById('keyword-item');
const searchResult = document.getElementById('search-result');
const keywordTitle = document.getElementById('keyword-title');
const keywordList = document.querySelector('.all-rankings-tag');
//Dropdown var
const dropdown = document.getElementById('dropdown');
const dropdownContent = document.querySelector('.dropdown-content');
const authbtn = document.getElementById('btn-auth');
const urlParams = new URLSearchParams(window.location.search);
//navigation mobile
const menuIcon = document.querySelector('.menu-icon');
const navigation = document.querySelector('nav');

menuIcon.addEventListener('click', () => {
    navigation.classList.toggle('is-visible');
});
function toggle(){
    dropdownContent.classList.toggle('is-visible');
}   

dropdown.addEventListener('click', (e) => {
    e.preventDefault();
    toggle(dropdownContent);
});



function onSignIn(googleUser){
    let profile = googleUser.getBasicProfile();
    let id_token = googleUser.getAuthResponse().id_token;
    let email = profile.getEmail();
    let firstname = profile.getGivenName();

    sendToServer(id_token, email, firstname);
}

function sendToServer(id_token, email, firstname){
    let xhr = new XMLHttpRequest();
    let params = 'id_token=' + id_token +'&email=' + email +'&firstname='+ firstname;
    xhr.open('POST', 'https://rank-me.000webhostapp.com/auth/auth.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function(e) {
        e.preventDefault();
        if (this.readyState == 4 && this.status == 200) {          
        } 
    }
    xhr.send(params);
}
// load auth2 library
function handleClientLoad() {
    gapi.load('auth2', initClient);
    gapi.load('client:auth2', youtubeClient);
}

// Init API client library an set
function initClient() {
    gapi.auth2.init({
        discoveryDocs: DISCOVERY_DOCS,
        clientId: config.clientid,
    }).then(() => {
        let auth2 = gapi.auth2.init({
                discoveryDocs: DISCOVERY_DOCS,
                clientId: config.clientid,
            });
        //Listen for sign in state changes
        auth2.isSignedIn.listen(updateSigninStatus);
        // handle initial sign in state
        updateSigninStatus(auth2.isSignedIn.get());
        signoutButton.onclick = handleSignoutClick;
    });
}

function youtubeClient(){
    gapi.client.init({
        discoveryDocs: DISCOVERY_DOCS,
        clientId: config.clientid,
        scope: SCOPES
    });
}

function updateSigninStatus(isSignedIn) {
    let auth2 = gapi.auth2.init({
            discoveryDocs: DISCOVERY_DOCS,
            clientId: config.clientid,
        });
    
    if (isSignedIn) {
        let profile = auth2.currentUser.get().getBasicProfile();
        let firstname = profile.getGivenName();
        
        showProfile(firstname);
        dropdown.style.display = "block";
        authbtn.style.display = "none";
        registerBtn.style.display = "none";
    } else {
        authbtn.style.display = "block";
        registerBtn.style.display = "block";
        dropdown.style.display = "none";
    }
}

//handle login
function handleAuthClick() {
   gapi.auth2.getAuthInstance().signIn({ scope: 'profile email'})
    .then(() => {
        let id_token = gapi.auth2.getAuthInstance().currentUser.get().getAuthResponse().id_token;
        window.location.href = "https://rank-me.000webhostapp.com/auth/auth.php?id_token="+ id_token;
        console.log('Sign in Successful');
    })
    .catch((err) => console.error(err));
}

function handleSignoutClick() {
    gapi.auth2.getAuthInstance().signOut();
    console.log('logout');
}
//display channel data
function showChannelData(data) {
    const channelData = document.getElementById('channel-data');
    channelData.innerHTML = data;
}
function showProfile(data){
    const profileName = document.querySelector('#profile-name');
    profileName.innerHTML = data;
}

function showSearch(data) {
    const showData = document.getElementById('show-data');
    showData.innerHTML = data;
}
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
async function showTags(action){
    const tagRes = await fetch('../data/autocomplete.json');
    const data = await tagRes.json();
    let flag = action;
    let output = '';

    if(flag === 1){
        data.forEach(item => {
            output +=  ` 
                    <ul>
                        <li>
                            <span><i class="fab fa-youtube"></i></span>
                            <a class="tag-data" href="index.php?keyword=${item.keyword}&id=${item.id}">${item.keyword}</a>
                        </li>
                    </ul>
            `;  
        });
        keywordList.innerHTML = output;  
    }else{
        keywordList.style.display = "none";

    }
}
async function getChannel(){
    let id_param = getParameterByName('id');
    const url = "https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id="+id_param+"&key="+ config.apikey +"&fields=items(id,snippet(title, description, customUrl, thumbnails), statistics(viewCount,subscriberCount,videoCount))&maxResults=10";
    const res = await fetch(url);
    let data = await res.json();

    let outputSearch = '';
    let output = '';


    for(let rank in data){
        data = data[rank];
    }
    
    let subscribers = data.slice(0);
    subscribers.sort((a, b) => {
        let subscriberfirst = a.statistics.subscriberCount;
        let subscribersecond = b.statistics.subscriberCount;

        return subscribersecond - subscriberfirst;
    });

    // let channelsListItems = subscriber.items;
    // console.log(subscribers[0].id);
    showTags(1);       
    let channelsListItems = subscribers;
    if(channelsListItems){
        channelsListItems.forEach((item, i) => {
            let keyword_param = getParameterByName('keyword');
            outputSearch += `
                    <div class="youtuber-details grid">
                        <div class="rank-number">
                            <strong>${'%d', i+1}</strong>
                        </div>
                        
                        <div class="img-youtuber">
                            <div class="user-img">
                                <img src="${item.snippet.thumbnails.default.url}"  alt="${item.snippet.title}" width="120px">
                            </div>
                        </div>

                        <div class="channel-info">
                            <h2><a href="https://www.youtube.com/${item.snippet.customUrl}">${item.snippet.title}</a></h2>
                            
                            <div class="desc-wrap">
                                <p id="channel-desc">${limitSring(item.snippet.description)}...</p>
                            </div>
                        </div>

                        <div class="mobile-grid">
                            <div class="subscribers-info">
                                <span>
                                    <strong>${numberWithComa(abbreviateNumber(item.statistics.subscriberCount))}</strong>
                                </span>
                                <span style="display: block;">Subscribers</span>
                            </div>

                            <div class="views-info">
                                <span>
                                    <strong>${numberWithComa(abbreviateNumber(item.statistics.viewCount))}</strong>
                                </span>
                                <span style="display: block;">Views</span>
                            </div>

                            <div class="videos-info">
                                <span>
                                    <strong>${numberWithComa(abbreviateNumber(item.statistics.videoCount))}</strong>
                                </span>
                                <span style="display: block;">Videos</span>
                            </div>
                        </div>
                    </div>
                `;
            showTags(0);
            keywordTitle.innerHTML = keyword_param;
            searchResult.innerHTML = outputSearch;
        });
    }
    
}
getChannel().catch(err => { console.error(err); });

function numberWithComa(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function limitSring(x) {
    let text = x;
    return text = text.substring(0, 120);   
}
function abbreviateNumber(number){
    let SI_SYMBOL = ["", "k", "M", "B", "T"];

    // what tier? (determines SI symbol)
    let tier = Math.log10(number) / 3 | 0;

    // if zero, we don't need a suffix
    if(tier == 0) return number;

    // get suffix and determine scale
    let suffix = SI_SYMBOL[tier];
    let scale = Math.pow(10, tier * 3);

    // scale the number
    let scaled = number / scale;

    // format number and add suffix
    return scaled.toFixed(1) + suffix;
}