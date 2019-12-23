const DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest"];
// const btnSignin = document.getElementById('signin');

function init() {
  gapi.load('auth2', initClient);

}
function initClient(){
	 gapi.auth2.init({
            discoveryDocs: DISCOVERY_DOCS,
            clientId: config.clientid,
     }).then(() => {
     	invalidLogout();

        // btnSignin.onclick = invalidLogout;
     });
}


function invalidLogout(){
	alert("You must login via google");
	gapi.auth2.getAuthInstance().signOut();
	window.location.href = "https://rank-me.000webhostapp.com";
}
