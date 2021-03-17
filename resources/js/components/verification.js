// import React, { Component } from 'react' ;
// import ReactDOM from 'react-dom';

// export default class Example extends Component {
//   render() {
//       render (
//         <div className="container">
//           <div className="row justify-content-center">
//             <div className="col-md-8">
//               <div className="card">
//                 <div className="card-header">Example Component</div>

//                 <div className="card-body">I'm an example Component</div>
//               </div>
//             </div>
//           </div>
//         </div>
//       )
//   }
// }

// if (document.getElementById('example')){
//     ReactDOM.render(<Example />, document.getElementById('example'));
// }

// class App extends Component {

//   constructor(){
//     super();
//     this.state={
//       email:"",
//       password:"",
//     }
//   }
//   submit(){
//     console.log(this.state)
//     fetch('url',{
//       method:'post',
//     })
//   }
//   render(){
//     return(
//       <div className="App">
//       <h1> React and Laravel Tutorial 3 </h1>
//       <input type="text" onChange={(item)=>{this.setState({email:item.target.val()})}}/>
//       <input type="password" onChange={(item)=>{this.setState({password:item.target.val()})}}/>
//       <button onClick={()=>{this.submit()}}> Login</button>
//       </div>
//       );
//   }
// }

// export default App;

import React, { Component } from 'react'
import ReactDOM from 'react-dom';
import axios from 'axios';
  
class Example extends Component {
  constructor (props) {
    super(props)
    this.state = {
      name: '',
      description: ''
    }
  
    this.onChangeValue = this.onChangeValue.bind(this);
    this.onSubmitButton = this.onSubmitButton.bind(this);
  }
   
    onChangeValue(e) {
        this.setState({
            [e.target.name]: e.target.value
        });
    }
  
    onSubmitButton(e) {
        e.preventDefault();
   
        axios.post('/formSubmit', {
            name: this.state.name,
            description: this.state.description
        })
        .then(function (response) {
            console.log(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });
        
        this.setState({
            name: '',
            description: ''
        })
    }
   
  componentDidMount () {
  }
   
  render () {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>
   
                        <div className="card-body">
                            <form onSubmit={this.onSubmitButton}>
                                <strong>Name:</strong>
                                <input type="text" name="name" className="form-control" value={this.state.name} onChange={this.onChangeValue} />
                                <strong>Description:</strong>
                                <textarea className="form-control" name="description" value={this.state.description} onChange={this.onChangeValue}></textarea>
                                <button className="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    )
  }
}
export default Example;
if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}