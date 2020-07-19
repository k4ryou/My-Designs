import React, { Component } from "react";
import Square from "./Square";
import "./Grid.css";
import uuid from "uuid";

export default class Grid extends Component {
  render() {
    return this.props.quadrados.map(quadrado => (
      <Square
        quadrado={quadrado}
        clicarquadrado={this.props.clicarquadrado}
        key={uuid()}
      />
    ));
  }
}
