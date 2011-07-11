function getNameFromId(storeId, id) {
    var mStore = Ext.data.StoreManager.lookup(storeId);
    var mRecord = mStore.getById(id);
    if (mRecord) {
        return mRecord.data.name;
    } else {
        return id;
    }
}

function getEmpresaFromId(id){
    return getNameFromId('empresaStore',id);
}

function getCuentaFromId(id){
    return getNameFromId('cuentaStore',id);
}

function getGrupoCuentaFromId(id){
    return getNameFromId('grupoCuentaStore',id);
}