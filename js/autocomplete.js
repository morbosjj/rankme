const search = document.getElementById('search');
const matchList = document.getElementById('match-list');
const matchContent = document.querySelector('.match-content');
const searchValue = document.getElementById('search-result');

const searchStates = async searchText => {
	const res = await fetch('../data/autocomplete.json');
	const states = await res.json();

	let matches = states.filter(state => {
		const regex = new RegExp(`^${searchText}`, 'gi');
		return state.keyword.match(regex);
	});

	if(searchText.length === 0){
		matches = [];
		matchList.innerHTML = '';
		matchContent.style.display = "none";

	}
	

	outputHtml(matches).catch(err => { console.error(err); });
};

const outputHtml = matches => {
	if(matches.length > 0){
		const html = matches.map(match => `
					<li>
						<div id="keyword-item">
							<a href="/index.php?keyword=${match.keyword}&id=${match.id}">${match.keyword}</a>
						</div>
					</li>
			`).join('');
		matchContent.style.display = "block";
		matchList.innerHTML = html;
	}else{
		matchContent.style.display = "none";
	}
};

search.addEventListener('input', () => searchStates(search.value));