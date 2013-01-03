package service;

import model.date;

public class DateNavService {
	
	date Date;
	private static DateNavService instance = null;
	
	public static DateNavService getInstance() {
	      if(instance == null) {
	         instance = new DateNavService();
	      }
	      return instance;
	   }
	
	public DateNavService() {
		
		Date = new date();
	}

	public date getDate() {
		return Date;
	}

	public void setDate(date date) {
		Date = date;
	}	
	
}
