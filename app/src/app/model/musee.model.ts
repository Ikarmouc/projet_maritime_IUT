import {Bateau} from './bateau.model';

export interface Musee {
  id?: number;
  adresse?: string;
  ville?: string;
  joursFermeture?: string;
  horaireOuverture?: number;
  horaireFermeture?: number;
  Bateau?: Bateau[];
}
