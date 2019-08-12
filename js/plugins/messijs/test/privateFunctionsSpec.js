// NOTE: Testing private functions is usually considered bad
// practice but I'm trying isolate what is wrong with nudge().

describe('Private function max', function() {
    it('should show 5 is greater than 3', function() {
        expect(Messi.prototype.max(5,3)).to.be.equal(5);
    });

    it('should show 3 is less than 7', function() {
        expect(Messi.prototype.max(3,7)).to.be.equal(7);
    });

    it('should show 3 is greater than -7', function() {
        expect(Messi.prototype.max(3,-7)).to.be.equal(3);
    });
});

describe('Private function isNumber', function() {
    it('should indicate 23 is a number', function() {
        expect(Messi.prototype.isNumber(23)).to.be.true;
    });

    it('should indicate -37 is a number', function() {
        expect(Messi.prototype.isNumber(-37)).to.be.true;
    });

    it('should indicate 17.6 is a number', function() {
        expect(Messi.prototype.isNumber(17.6)).to.be.true;
    });

    it('should indicate "14" is a number', function() {
        expect(Messi.prototype.isNumber('14')).to.be.true;
    });

    it('should indicate "32px" is not a number', function() {
        expect(Messi.prototype.isNumber('32px')).to.be.false;
    });

    it('should indicate "six" is not a number', function() {
        expect(Messi.prototype.isNumber('six')).to.be.false;
    });

    it('should indicate "16th" is not a number', function() {
        expect(Messi.prototype.isNumber('16th')).to.be.false;
    });

    it('should indicate null is not a number', function() {
        expect(Messi.prototype.isNumber(null)).to.be.false;
    });

    it('should indicate a function is not a number', function() {
        expect(Messi.prototype.isNumber(function() {})).to.be.false;
    });
});
