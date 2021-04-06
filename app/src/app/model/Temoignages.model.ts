import { Musee } from '../../Model/Musee.model';
import {HistoireBateau} from '../../Model/HistoireBateau.model';

export interface TemoignagesModel
{
  temoignageAudio?: string;
  temoignageTexte?: TextEncoder;
}
