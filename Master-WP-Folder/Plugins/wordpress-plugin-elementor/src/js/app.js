import lmpInitSearchFunctionality from './components/search-box';
import lmpInitMediaTab from './components/media-tab';

window.lmpInitSearchFunctionality = lmpInitSearchFunctionality;

if (document.querySelector('#jis_admin_page_container')) {
    lmpInitSearchFunctionality(['all'], document.querySelector('#jis_admin_page_container'));
}
lmpInitMediaTab();
