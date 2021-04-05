import {Bateau} from './bateau.model';

export interface LocalisationBateau {
  id?: number;
  latitude?: number;
  longitude?: number;
  lieuActuel?: string;
  Bateau?: Bateau;
}
