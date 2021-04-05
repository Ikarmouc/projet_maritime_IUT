import {Bateau} from './Bateau.model';


export interface HistoireBateau{
  id?: number;
  bateauId?: Bateau;
  anneeLancement?: string;
  constructeur ?: string[4];
  proprietaire?: string[4];
  anneeEntreeCollection?: string;
  dateMonumentHistorique?: string;
  anneeRestauration?: string;
  Historique?: string;
}
