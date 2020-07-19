import React, { Component } from "react";
import Header from "./components/Header";
import Grid from "./components/Grid";
import "./components/Grid.css";
import "./App.css";
import Flag from "./components/images/flag.png";
import Bomb from "./components/images/bomba.png";

var contarvencer = 0;

function getrandommine(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}
function gerarminas() {
  var minas = [];
  for (let index = 0; index < 10; index++) {
    minas[index] = getrandommine(0, 80);
  }

  for (let i = 0; i < minas.length; i++) {
    for (let j = i + 1; j < minas.length; j++) {
      if (minas[i] === minas[j]) {
        minas[j] = getrandommine(0, 80);
      }
    }
  }

  return minas;
}

var minas = gerarminas();
console.log(minas);

var arr = [];
var auxarr = 0;
for (let i = 0; i < 9; i++) {
  for (let j = 0; j < 9; j++) {
    if (minas.includes(auxarr)) {
      arr.push({
        value: null,
        row: i,
        col: j,
        cor: "#2797A5B3",
        isbomb: true,
        logo: null,
        open: false
      });
      auxarr++;
    } else {
      arr.push({
        value: null,
        row: i,
        col: j,
        cor: "#2797A5B3",
        isbomb: false,
        logo: null,
        open: false
      });
      auxarr++;
    }
  }
}

export default class App extends Component {
  state = {
    corbotao: "#f44250",
    estadojogo: "Playing...",
    gameover: false,
    flag: false,
    numflags: 10,
    squares: arr
  };

  clicarquadrado = (row, col) => {
    var count = 0;
    this.setState({
      squares: this.state.squares.map(quadrado => {
        if (
          quadrado.row === row - 1 &&
          quadrado.col === col &&
          quadrado.isbomb
        ) {
          count++;
        }
        if (
          quadrado.row === row + 1 &&
          quadrado.col === col &&
          quadrado.isbomb
        ) {
          count++;
        }
        if (
          quadrado.row === row &&
          quadrado.col === col + 1 &&
          quadrado.isbomb
        ) {
          count++;
        }
        if (
          quadrado.row === row &&
          quadrado.col === col - 1 &&
          quadrado.isbomb
        ) {
          count++;
        }
        if (
          quadrado.row === row - 1 &&
          quadrado.col === col + 1 &&
          quadrado.isbomb
        ) {
          count++;
        }
        if (
          quadrado.row === row - 1 &&
          quadrado.col === col - 1 &&
          quadrado.isbomb
        ) {
          count++;
        }
        if (
          quadrado.row === row + 1 &&
          quadrado.col === col + 1 &&
          quadrado.isbomb
        ) {
          count++;
        }
        if (
          quadrado.row === row + 1 &&
          quadrado.col === col - 1 &&
          quadrado.isbomb
        ) {
          count++;
        }

        return quadrado;
      })
    });
    this.preencherquadrado(count, row, col, "number");
  };

  preencherquadrado(count, row, col) {
    if (!this.state.flag && !this.state.gameover) {
      this.setState({
        squares: this.state.squares.map(quadrado => {
          if (
            quadrado.row === row &&
            quadrado.col === col &&
            !quadrado.isbomb &&
            quadrado.logo !== Flag
          ) {
            if (!quadrado.open) {
              contarvencer++;

              console.log(quadrado.countminas);
              if (contarvencer === 89) {
                this.setState({ estadojogo: "Venceu!" });
              }
            }
            if (count !== 0) {
              quadrado.value = count;
            }
            quadrado.cor = "white";
            quadrado.open = true;
            quadrado.logo = null;
          }
          if (
            quadrado.row === row &&
            quadrado.col === col &&
            quadrado.isbomb &&
            quadrado.logo !== Flag
          ) {
            this.setState({ gameover: true });
            quadrado.logo = Bomb;
            quadrado.cor = "#F43636BF";
            this.setState({ estadojogo: "You Lost!" });
          }

          return quadrado;
        })
      });
    } else {
      if (!this.state.gameover) {
        this.setState({
          squares: this.state.squares.map(quadrado => {
            if (
              quadrado.row === row &&
              quadrado.col === col &&
              !quadrado.open
            ) {
              if (quadrado.logo === Flag) {
                quadrado.logo = null;
                quadrado.cor = "#2797A5B3";
                this.setState({ numflags: this.state.numflags + 1 });
                contarvencer--;
                console.log(contarvencer);
              } else if (this.state.numflags > 0) {
                quadrado.logo = Flag;
                quadrado.cor = "#4CAF50CC";
                this.setState({ numflags: this.state.numflags - 1 });
                if (quadrado.isbomb) {
                  contarvencer++;
                  console.log(contarvencer);
                  if (contarvencer === 71) {
                    this.setState({ estadojogo: "You won!" });
                  }
                }
              }
            }

            return quadrado;
          })
        });
      }
    }
  }

  inserirbandeira = () => {
    if (this.state.flag === false) {
      this.setState({ flag: true });
      this.setState({ corbotao: "#4CAF50CC" });
    } else {
      this.setState({ flag: false });
      this.setState({ corbotao: "#f44250" });
    }
  };

  render() {
    return (
      <div>
        <Header />
        <div className="dados">
          <h4>{this.state.estadojogo}</h4>
          <h5>Flags: {this.state.numflags}</h5>
          <button
            className="btn-flag"
            onClick={this.inserirbandeira}
            style={{ backgroundColor: this.state.corbotao }}
          >
            Activate Flags
          </button>
        </div>
        <div className="Grid">
          <Grid
            cor={this.state.cor}
            quadrados={this.state.squares}
            clicarquadrado={this.clicarquadrado}
          />
        </div>
      </div>
    );
  }
}
