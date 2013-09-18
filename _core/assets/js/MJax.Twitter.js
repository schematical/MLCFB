MJax.Twitter = {

    InitTwitterListPanel:function(strControlId, mixQuery, intRepeat){
        MJax.Twitter.Ctl.Panels[strControlId] = new MJax.Twitter.Ctl.TweetListPanel(strControlId, mixQuery);
    }

};
MJax.Twitter.Ctl = {};
MJax.Twitter.Ctl.TweetListPanel = function(strControlId, mixQuery, intRepeat){
    this.strControlId = strControlId;
    this.mixQuery = mixQuery;
    this.interval = setInterval(
        this.GetPath() + '.Refresh',
        intRepeat
    );

    this.Refresh();
    return this;
};
MJax.Twitter.Ctl.TweetListPanel.prototype.RenderSearch = function(objResults){
    console.log(objResults);
}
MJax.Twitter.Ctl.TweetListPanel.prototype.Refresh = function(){
    MLC.Twitter.Search(this.mixQuery, this.GetPath() + '.RenderSearch');
}
MJax.Twitter.Ctl.TweetListPanel.prototype.GetPath = function(){
    return 'MJax.Twitter.Ctl.Panels.' + this.strControlId;
}
MJax.Twitter.Ctl.Panels = {};