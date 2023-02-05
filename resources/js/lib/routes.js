export const routeAccount = {
    signUp: 'user-account.create',
    loginStore: 'login.store',
    login: 'login',
    logout: 'logout',

};

export const routeBlog = {
    list: 'blog.index',
    show: 'blog.show',
    creator: {
        list: 'creator.blog.index',
        create: 'creator.blog.create',
        store: 'creator.blog.store',
        show: 'creator.blog.show',
        edit: 'creator.blog.edit',
        update: 'creator.blog.update',
        delete: 'creator.blog.delete',
        image: {
            create: 'creator.blog.image.create',
            store: 'creator.blog.image.store',
        },
    },
};
