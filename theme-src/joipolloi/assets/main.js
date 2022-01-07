import './scripts/publicPath';
import '@ungap/custom-elements';
import 'console-polyfill';
import 'normalize.css/normalize.css';
import './main.scss';

function importAll (r) {
  r.keys().forEach(r);
}

importAll(require.context('../Components/', true, /\/script\.js$/));
