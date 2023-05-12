const SET_USERINFO = (state, payload) => {
    state.info = payload
};

const SET_ISAUTHENTICATED = (state, payload) => {
    state.isAuthenticated = payload;
}

const SET_SUBJECTS = (state, payload) => {
    state.subjects = payload
}

export default {
    SET_USERINFO,
    SET_ISAUTHENTICATED,
    SET_SUBJECTS
}
