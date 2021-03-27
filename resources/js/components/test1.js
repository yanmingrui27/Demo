import React from 'react';
// import 'css/App.css';

function App(){
	return(
		<div>
			<ul>
				<li>Amy</li>
				<li>Ben</li>
				<li>Charles</li>
			</ul>
		</div>
	);
}

export default App;
if (document.getElementById('example')) {
    ReactDOM.render(<App />, document.getElementById('example'));
}