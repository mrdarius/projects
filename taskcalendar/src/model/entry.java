package model;

import android.graphics.Bitmap;
import android.util.Log;

public class entry {
	
	public static final String DATABASE_NAME = "photos.sqlite";
	public static final String TABLE = "photoTable";
	public static final String ID = "_id";
	public static final String FNAME = "fname";
	public static final String INAME = "iname";
	public static final String EYEAR = "eyear";
	public static final String EMONTH = "emonth";
	public static final String EDAY = "eday";
	

	private int id;
	private String name;
	private Bitmap image;
	private String iname;
	private int eyear;
	private int emonth;
	private int eday;
	
	
	public int getEyear() {
		return eyear;
	}


	public void setEyear(int eyear) {
		this.eyear = eyear;
	}


	public int getEmonth() {
		return emonth;
	}


	public void setEmonth(int emonth) {
		this.emonth = emonth;
	}
	
	public String getDate()
	{
		return eyear + "-" + emonth + "-" + eday;
	}
	


	public int getEday() {
		return eday;
	}


	public void setEday(int eday) {
		this.eday = eday;
	}


	public entry()
	{
		super();
	}


	public entry(int id, String name, String iname) {
		super();
		this.id = id;
		this.name = name;
		this.iname = iname;
	}


	public entry(int id, int eyear, int emonth, int eday, String fname,
			String iname) {
		this.id = id;
		this.eyear = eyear;
		this.emonth = emonth;
		this.eday = eday;
		this.name = fname;
		this.iname = iname;
	}


	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getIname() {
		
		return iname;
	}
	
	public void setIname(String iname) {
		this.iname = iname;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public Bitmap getImage() {
		return image;
	}
	public void setImage(Bitmap image) {
		this.image = image;
	}	
		

}
