import { Musee } from './Musee.model';
import {HistoireBateau} from './HistoireBateau.model';

export interface TemoignagesModel
{
  temoignageAudio?: string;
  temoignageTexte?: TextEncoder;
}
