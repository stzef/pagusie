var symbol_currency = "$"
function CurrencyFormat(){
	//numberFormat = Intl.NumberFormat({style:"currency",currency:"COP",currencyDisplay:"symbol"})
	this.numberFormat = Intl.NumberFormat("es-419")
}
CurrencyFormat.prototype.format = function(number){
	if(this.numberFormat.format(number) == "NaN") return symbol_currency+" 0"
		return symbol_currency+" " + this.numberFormat.format(number)
}
CurrencyFormat.prototype.clear = function(number){
	return number.replace(",","").replace(/[^\d\.\,\s]+/g,"").trim()
}
CurrencyFormat.prototype.sToN = function(s){
	var n = parseFloat(s.replace(/ /g,"").replace(/,/g,"").replace(/[^\d\.\,\s]+/g,"").trim())//.replace(/\./g,"")
	return n
}

var currencyFormat = new CurrencyFormat()

export default currencyFormat

