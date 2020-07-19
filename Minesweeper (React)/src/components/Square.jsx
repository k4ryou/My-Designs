import React, { Component } from "react";
import "./Square.css";
import Flag from "./images/flag.png";

export default class Square extends Component {
  render() {
    return (
      <div
        className="square"
        row={this.props.quadrado.row}
        col={this.props.quadrado.col}
        style={{ backgroundColor: this.props.quadrado.cor }}
        onClick={this.props.clicarquadrado.bind(
          this,
          this.props.quadrado.row,
          this.props.quadrado.col
        )}
      >
        <img src={this.props.quadrado.logo} alt="" />
        {this.props.quadrado.value}
      </div>
    );
  }
}
