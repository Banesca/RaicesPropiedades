export interface ISuscripcion {
    email: string;
}


export class CSuscripcion {
    static empy() {
        return {
            email: ""
        }as ISuscripcion
    }
}