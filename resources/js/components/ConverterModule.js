import React from 'react';
import ReactDOM from 'react-dom';


export default class ConverterModule extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            mode:-1,
            valueToConvert: '',
            value: '',
            error: false
        };
    }

    handleChange = (toChange,value) => {
        let nState = this.state;
        nState[toChange] = value;
        nState['mode'] = parseInt(nState['mode']);
        this.setState(nState);
    }

    convert = () => {
        if(this.state.mode === -1 ){
            alert("Please Select a Mode");
            return;
        }

        if(this.state.valueToConvert.trim() === ''){
            alert("Please Enter a Value");
            return;
        }
        let self = this;
        axios.post('/api/convert',this.state)
            .then(function (response){
            self.setState({'value':response.data.value, 'error': false})
            }).catch(function (error){
                self.setState({'value':error.response.data.message, 'error': true})
                console.log(error.response.data.message);
        })
    }

    render() {
        return(
            <>
                <div id={'converterContainer'}>
                    <p>Value</p>
                    <input type={"text"} onChange={ (e) => {this.handleChange('valueToConvert',e.target.value)} }/>
                    <p>Mode</p>
                    <select onChange={(e) => this.handleChange('mode',e.target.value)}>
                        <option selected={true} value={-1}>Please Select a Convert Option</option>
                        <option value={0}>Convert To Roman Numerals</option>
                        <option value={1}>Convert To Integer Numerals</option>
                    </select>

                    <button className={'btn btn-success'} onClick={this.convert}>Convert!</button>
                    <br/>
                    {this.state.error && (
                        <div className={"alert alert-danger"} id={'results'}>
                            {this.state.value}
                        </div>
                    )}
                    {!this.state.error && (
                        <div className={"alert alert-success"} id={'results'}>
                            {this.state.value}
                        </div>
                    )}

                </div>
            </>
        );
    }
}

