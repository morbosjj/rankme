const DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest"];
const SCOPES = 'https://www.googleapis.com/auth/youtube.readonly';
const authorizeButton = document.getElementById('authorize-button');

function handleClientLoad() {
    gapi.load('auth2', initClient);
    gapi.load('client:auth2', youtubeClient);
}
function initClient() {
    gapi.auth2.init({
        discoveryDocs: DISCOVERY_DOCS,
        clientId: config.clientid,
    }).then(() => {
        let auth2 = gapi.auth2.init({
                discoveryDocs: DISCOVERY_DOCS,
                clientId: config.clientid,
            });

        // handle initial sign in state
        authorizeButton.onclick = handleAuthClick;
    });
}
function youtubeClient(){
    gapi.client.init({
        discoveryDocs: DISCOVERY_DOCS,
        clientId: config.clientid,
        scope: SCOPES
    });
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