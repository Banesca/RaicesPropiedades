/* FUNCIONES UTILES */
export class Arreglos {
  static eliminarElementosDuplicados(pArreglo) {
    const pNuevoArreglo = [];
    const lNewObj = {};

    for (let i = 0; i < pArreglo.length; i++) {
      lNewObj[pArreglo[i]] = '';
    }

    // tslint:disable-next-line:forin
    for (const i in lNewObj) {
      pNuevoArreglo.push(i);
    }
    return pNuevoArreglo;
  }
}

export class Objetos {
  static Clonar(pObjeto): any {
    if (pObjeto) {
      return JSON.parse(JSON.stringify(pObjeto));
    } else {
      return null;
    }
  }
}
