import React from 'react';
import ReactDOM from 'react-dom';
import ConverterModule from "./ConverterModule";

export default class ConverterLayout extends React.Component {
    constructor(props) {
        super(props);
        this.state = {};
    }

    render() {
        return(
            <>

                <nav><h1>Roman Numeral Converter</h1></nav>

                <ConverterModule/>

                <footer>Made with Love By J </footer>
            </>
        );
    }
}

if (document.getElementById('hello-react')) {
    ReactDOM.render(<ConverterLayout />, document.getElementById('hello-react'));
}
