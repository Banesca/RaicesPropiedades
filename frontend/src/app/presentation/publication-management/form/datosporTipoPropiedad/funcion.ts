export function isMedidas(value: string): boolean {
    switch (value) {
        case 'Hall':
        case 'Escritorio':
        case 'Living':
        case 'Comedor':
        case 'Dormitorio':
        case 'Cocina':
        case 'ComedorDiario':
        case 'Jardin':
        case 'Patio':
        case 'Balcon':
        case 'Sotano':
        case 'Oficina':
        case 'Deposito':
        case 'Archivo':
        case 'Sala':
            return true;
        default:
            return false;
    }
}